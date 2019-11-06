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
                                            $("#result").html('<p class="text-info">Configuring...</p>');
                                            setTimeout(() => {$("#result").append('<p class="text-success">Done!</p>')}, 1250);
                                            setTimeout(() => {location.href = maindir}, 1750);
                                        },
                                        error: function (jXHR, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        }
                                    });
                                });
                            });
                            {/literal}
                        </script>