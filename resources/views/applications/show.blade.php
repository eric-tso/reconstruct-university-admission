<x-app>
    <div class="mt-8" style="text-align:center"><a href="javascript:history.back()" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Back to Last Page</a></div> 
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">            
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="w-full bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="card-header">
                                Details of Applicant (User ID: {{ $application->user->id }})
                            </div>
                            <div class="card-body">
                                <div class="p-4 bg-white rounded-lg md:p-8" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white">
                                        <h2 id="accordion-flush-heading-1">
                                            <button type="button" class="flex justify-between items-center py-5 w-full font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                                            <span>1. Personal Particular</span>
                                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                                            <div class="py-2 border-b border-gray-200 dark:border-gray-700">
                                                <ul class="list-group list-group-hover">
                                                    <div class="bg-blue-400 text-black text-center rounded">Personal Information</div>
                                                    <li class="list-group-item">English Name: {{ $application->englishName }}</li>
                                                    <li class="list-group-item">Chinese Name: {{ $application->chineseName }}</li>
                                                    <li class="list-group-item">Sex: {{ $application->sex }}</li>
                                                    <li class="list-group-item">Date of Birth: {{ $application->dateOfBirth }}</li>
                                                    <li class="list-group-item">Nationality: {{ $application->nationality }}</li>
                                                </ul>
                                                <br>
                                                <ul class="list-group list-group-hover">
                                                    <div class="bg-blue-400 text-black text-center rounded">Contact</div>
                                                    <li class="list-group-item">Homephone Number: {{ $application->homephoneNumber }}</li>
                                                    <li class="list-group-item">Mobile Number: {{ $application->mobileNumber }}</li>
                                                    <li class="list-group-item">Mailing Address: {{ $application->mailingAddress }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2 id="accordion-flush-heading-2">
                                            <button type="button" class="flex justify-between items-center py-5 w-full font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
                                            <span>2. Academic Profile</span>
                                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-2" class="" aria-labelledby="accordion-flush-heading-2">
                                            <div class="py-2 border-b border-gray-200 dark:border-gray-700">
                                            <ul class="list-group list-group-hover">
                                            <div class="bg-blue-400 text-black text-center rounded">Seconday School</div>
                                            <li class="list-group-item">Country/Region: {{ $application->secondaryCountry }}</li>
                                            <li class="list-group-item">Name of School: {{ $application->secondarySchool }}</li>
                                            <li class="list-group-item">Date of Admission: {{ $application->secondaryAdmission }}</li>
                                            <li class="list-group-item">Date/Expected Date of Completion: {{ $application->secondaryCompletion }}</li>
                                        </ul>
                                        <br>
                                        <ul class="list-group list-group-hover">
                                            <div class="bg-blue-400 text-black text-center rounded">Post-Seconday School</div>
                                            <li class="list-group-item">Country/Region: {{ $application->postCountry }}</li>
                                            <li class="list-group-item">Name of School: {{ $application->postSchool }}</li>
                                            <li class="list-group-item">Studying Programme: {{ $application->postProgramme }}</li>
                                            <li class="list-group-item">Qualidication of Programme: {{ $application->postQualification }}</li>
                                            <li class="list-group-item">Studying Mode of Programme: {{ $application->postMode }}</li>
                                            <li class="list-group-item">Latest Cumulative CGPA {{ $application->postCgpa }} out of maximum CGPA {{ $application->postMaxCgpa }}</li>
                                            <li class="list-group-item">Date of Admission: {{ $application-> postAdmission}}</li>
                                            <li class="list-group-item">Date/Expected Date of Completion: {{ $application-> postCompletion}}</li>
                                        </ul>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>