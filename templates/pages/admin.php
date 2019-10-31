{if isset($account) && $account->isAdmin()}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-dark">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="admin-options-list" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active bg-transparent border-0" href="#general" role="tab" aria-controls="general" aria-selected="true">General Settings</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link bg-transparent border-0" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link bg-transparent border-0" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Deals</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <h4 class="card-title">Admin Panel</h4>
                    <h6 class="card-subtitle mb-2">Edit any website setting from here</h6>
                    
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="general" role="tabpanel">
                        <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                        <a href="#" class="card-link text-danger">Read more</a>
                        </div>
                        
                        <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">  
                        <p class="card-text">First settled around 1000 BCE and then founded as the Etruscan Felsina about 500 BCE, it was occupied by the Boii in the 4th century BCE and became a Roman colony and municipium with the name of Bononia in 196 BCE. </p>
                        <a href="#" class="card-link text-danger">Read more</a>
                        </div>
                        
                        <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                        <p class="card-text">Immerse yourself in the colours, aromas and traditions of Emilia-Romagna with a holiday in Bologna, and discover the city's rich artistic heritage.</p>
                        <a href="#" class="btn btn-danger btn-sm">Get Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{$customdir}}/js/admin_options.js"></script>
{else}
    <p class="not-logged">You're not logged in or not enough permissions. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{/if}