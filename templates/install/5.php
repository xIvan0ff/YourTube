                        <div class="card-body">
                            <h5 class="card-title">Running Migrations</h5>
                            <p class="card-text">{{$config.name}} will need it's database populated. Please run all migrations.</p>
                            <form class="form" id="database-form" method='post' action="?step=6">
                                <pre><p id="result" class="text-success"></p></pre>
                                <button type="submit" id="fifth-step" class="btn btn-back">Run <i class="fas fa-database"></i> & Continue <i class="fas fa-arrow-circle-right"></i></button>
                            </form>
                            <div>
                        </div>
                        <script>
                            var url = maindir + "/functions/run_migrations.php";
                            $("#database-form").submit(function(e) {

                                e.preventDefault();

                                var form = $(this);
                                var nextUrl = form.attr('action');

                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: "post:1",
                                    // data: form.serialize(),
                                    success: function(data)
                                    {
                                        $('#result').html(data);
                                    }
                                });

                                setTimeout(() => {
                                    window.location.href = nextUrl;
                                }, 2500);
                            });
                        </script>