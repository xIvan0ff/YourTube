                        <div class="card-body">
                            <h5 class="card-title">Install Completed</h5>
                            <p class="card-text">{{$config.name}} was successfully installed.</p>
                            <p>You may sign in with username <kbd class="text-primary">admin</kbd> and password <kbd class="text-primary">password</kbd>.</p>
                            <form class="form" id="final-form" method='post' action="?step=final">
                                <input type="hidden" id="installed" name="installed" value="1">
                                <button type="submit" id="sixth-step" class="btn btn-back">Finish <i class="fas fa-clipboard-check"></i></button>
                            </form>
                            <pre id="result"></pre>
                            <div>
                        </div>
                        <script>
                            {literal}
                            $(document).ready(function () {
                                $('#final-form').on('submit', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url : $(this).attr('action') || window.location.pathname,
                                        type: "POST",
                                        data: $(this).serialize(),
                                        success: function (data) {
                                            $("#sixth-step").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                                            setTimeout(() => {$("#result").append('<p class="mt-0 pt-0 text-warning">Checking installation...</p>')}, 500);
                                            setTimeout(() => {$("#result").append('<p class="mt-0 pt-0 text-info">No issues.</p>')}, 1500);
                                            setTimeout(() => {$("#result").append('<p class="mt-0 pt-0 text-warning">Checking database...</p>')}, 1750);
                                            setTimeout(() => {$("#result").append('<p class="mt-0 pt-0 text-info">No issues.</p>')}, 2250);
                                            setTimeout(() => {$("#result").append('<p class="mt-0 pt-0 text-success">Done!</p>')}, 2500);
                                            setTimeout(() => {location.href = maindir}, 3000);
                                        },
                                        error: function (jXHR, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        }
                                    });
                                });
                            });
                            {/literal}
                        </script>