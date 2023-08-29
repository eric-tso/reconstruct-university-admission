<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header uppercase">
                            Handling Changing Time Request (Application No.: A{{ $interview->appliedProgramme->user->application->id }}-R{{ $interview->appliedProgramme->rank }})
                        </div>
                        <div class="card-body">        
                            <form method="POST" action="/interviews/{{ $interview->id }}">
                                @csrf
                                @method('PATCH')

                                <x-form.input name="appliedProgramme" label="Applied Programme" value="{{ $interview->appliedProgramme->programme->name }}" disabled />
                                <x-form.input name="originalInterviewDate" label="Original Interview Date" value="{{ $interview->interviewPeriod->date }}" disabled />
                                <x-form.input name="originalInterviewTime" label="Original Interview Time" value="{{ $interview->time }}" disabled />
                                <x-form.field>
                                    <x-form.label name="newInterviewDate" />
                                    <select name="newInterviewDate" id="newInterviewDate" class="border border-gray-200 p-2 w-full rounded">
                                        <option hidden disabled selected value>--Select--</option>  
                                        @foreach ($emptyDates as $emptyDate)
                                            <option value="{{ $emptyDate->id}}">{{ $emptyDate->date }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error name="newInterviewDate" />
                                </x-form.field>
                                <x-form.field>
                                    <x-form.label name="newInterviewTime" />
                                    <select name="newInterviewTime" id="newInterviewTime" class="border border-gray-200 p-2 w-full rounded">
                                    </select>
                                    <x-form.error name="newInterviewTime" />
                                </x-form.field>
                                
                                <div class="d-flex justify-content-center">
                                    <a class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600 mx-2" href="/changingTimeRequest">Back</a>
                                    <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mx-2" type="submit">Submit</button>
                                </div>
                            </form>
                            <form method="POST" action="/interviews/{{ $interview->id }}" class="hidden" id="noEmptyForm">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="noEmpty" value="true">
                                <div class="d-flex justify-content-center">
                                    <button class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mt-4" type="submit">No Empty</button>
                                </div>
                            <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type='text/javascript'>

        $(document).ready(function(){

            $('#newInterviewDate').change(function(){

                var timePeriodId = $(this).val();

                $('#newInterviewTime').find('option').remove();
                $("#newInterviewTime").append("<option disabled selected value=''>--Select--</option>"); 

                $.ajax({
                    url: '/getEmptyTime/'+timePeriodId,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){

                        var len = 0;
                        if(response['data'] != null){
                        len = response['data'].length;
                        }

                        if(len > 0){
                        // Read data and create <option >
                            for(var i=0; i<len; i++){

                                var id = response['data'][i].id;
                                var time = response['data'][i].time;

                                if(id == null){
                                    $('#newInterviewTime').find('option').remove();
                                    var option = "<option value=''>No Any Empty of Selected Date</option>";
                                    document.getElementById("noEmptyForm").style.display="block";

                                    
                                }else{
                                    var option = "<option value='"+id+"'>"+time+"</option>"; 
                                }

                                $("#newInterviewTime").append(option); 
                            }
                        }

                    },
                });
            });

        });

    </script>
</x-app>

