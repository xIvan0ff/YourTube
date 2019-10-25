                        <div class="card-body">
                            <h5 class="card-title">Choose name</h5>
                            <p class="card-text">This will be the name of your website.</p>

                            <form class="form" id="name-form" method='post' action='?step=3'>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="name" id="name" placeholder="The name of your website." value='{{$config.name}}'>
                                </div>
                                <button type="submit" href="" id="second-step" class="btn btn-back">Next <i class="fas fa-arrow-circle-right"></i></button>
                            </form>

                        </div>