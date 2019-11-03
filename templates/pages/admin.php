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
                        <a class="nav-link bg-transparent border-0" href="#migrations" role="tab" aria-controls="migrations" aria-selected="false">Migrations</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link bg-transparent border-0" href="#config" role="tab" aria-controls="config" aria-selected="false">Config</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <h4 class="card-title">Admin Panel</h4>
                    <h6 class="card-subtitle mb-2">Edit any website setting from here</h6>
                    
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="general" role="tabpanel">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p class="text-warning">TODO: UPDATE CONFIG</p>    
                                </div>
                                <div class="col-12 col-md-4 text-center">
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <h5 class="card-title m-0">Version Checker</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-none" id="version-compare">                                      
                                                <p class="m-0">Current Version: <span class="text-info" id="current-ver">{{$config.version}}</span></p>
                                                <p class="m-0">Latest Version: <span class="text-success" id="latest-ver"></span></p>
                                                <pre id="version-check" class="text-primary"></pre>
                                                <a role="button" class="btn btn-back" target="_blank" href="https://github.com/xIvan0ff/YourTube">Open Github</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="migrations" role="tabpanel">
                            <div class="row text-center justify-content-around">
                                <div class="col-3">
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <h6 class="card-title m-0">All Migrations</h6>
                                        </div>
                                        <div class="card-body">
                                           <p class="card-text font-weight-bold"><span id="all-migrations" class="counter" data-duration="1250"></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div cla
                                <div class="col-3">
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <h6 class="card-title m-0">Ran Migrations</h6>
                                        </div>
                                        <div class="card-body">
                                           <p class="card-text font-weight-bold"><span id="ran-migrations" class="counter" data-duration="1250"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-dark mt-2">
                                <form class="form text-center" id="database-form" method='post'>
                                    <pre class="mt-2 mb-0"><p id="migrations-result" class="text-success"></p></pre>
                                    <button type="submit" id="run-migrations" class="btn btn-back" disabled>Run unmigrated migrations.</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="config" role="tabpanel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{$customdir}}/js/admin_options.js"></script>
    <script src="{{$customdir}}/js/migrations_ajax.js"></script>
{else}
    <p class="not-logged">You're not logged in or not enough permissions. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{/if}
