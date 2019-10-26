                        <div class="card-body">
                            <h5 class="card-title">Administrator Password</h5>
                            <p class="card-text">This will be password used for administrative operations.</p>

                            <form class="form" id="password-form" method='post' action='?step=4'>
                                <div class="form-group">
                                    <label for="adminpass">Administrator Password:</label>
                                    <input type="password" required class="form-control bg-dark border-dark" name="adminpass" id="adminpass" placeholder="Enter an administrator password." value="{{$config.adminpass}}">
                                </div>
                                <button type="submit" id="second-step" class="btn btn-back">Next <i class="fas fa-arrow-circle-right"></i></button>
                            </form>

                        </div>