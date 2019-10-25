                        <div class="card-body">
                            <h5 class="card-title">Install Completed</h5>
                            <p class="card-text">{{$config.name}} was successfully installed.</p>
                            <p>You may sign in with username <kbd class="text-primary">admin</kbd> and password <kbd class="text-primary">password</kbd>.</p>
                            <form class="form" id="final-form" method='post' action="">
                                <input type="hidden" id="installed" name="installed" value="1">
                                <button type="submit" href="" id="sixth-step" class="btn btn-back">Finish <i class="fas fa-clipboard-check"></i></button>
                            </form>
                            <div>
                        </div>