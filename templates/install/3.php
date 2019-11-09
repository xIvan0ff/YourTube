                        <div class="card-body">
                            <h5 class="card-title">License Check</h5>
                            <p class="card-text">We need to be sure that your copy of <span class="text-danger">YourTube</span> is legitimate.</p>
                            <form class="form" id="password-form" method='post' action='?step=4'>
                                <div class="form-group">
                                    <label for="license">License Key:</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="license" id="license" placeholder="Enter a license key." value="{{$config.license}}">
                                    <small>Enter anything, licenses will be implemented once the project is almost finished.</small>
                                </div>
                                <button type="submit" id="second-step" class="btn btn-back">Next <i class="fas fa-arrow-circle-right"></i></button>
                            </form>

                        </div>