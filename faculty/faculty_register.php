<div class="card-back">
                                            <div class="center-wrap">
                                                <h4 class="heading">Sign Up</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Your Name"
                                                        autocomplete="off" name="name" required pattern="[A-Za-z\s]+" title="Name should only contain letters.">
                                                    <i class="input-icon material-icons">perm_identity</i>
                                                </div>

                                                <div class="form-group">
                                                    <input type="email" class="form-style" placeholder="Your Email"
                                                        autocomplete="off" name="email" id="email" required>
                                                    <i class="input-icon material-icons">alternate_email</i>
                                                </div>
                                                <div id="email-error" style="color: red; display: none;">This email already exists.</div>
                                                <script>
                                                    document.getElementById('email').addEventListener('blur', function() {
                                                        var email = this.value;
                                                        if (email) {
                                                            fetch('../api/check_email.php?email=' + email)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    if (data.exists) {
                                                                        document.getElementById('email-error').style.display = 'block';
                                                                        this.value = "";
                                                                    } else {
                                                                        document.getElementById('email-error').style.display = 'none';
                                                                    }
                                                                })
                                                                .catch(error => console.error('Error:', error));
                                                        }

                                                    });
                                                </script>

                                                <div class="form-group">
                                                    <input type="number" class="form-style" placeholder="Your Mobile Number"
                                                        autocomplete="off" name="mobile" required>
                                                    <i class="input-icon material-icons">phone</i>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-style"
                                                        placeholder="Your Password" autocomplete="off" name="password" required>
                                                    <i class="input-icon material-icons">lock</i>
                                                </div>
                                                <div class="form-group">
                                                    <select id="dropdown" class="form-style" name="department" required>
                                                        <option value="" disabled selected>Select Department</option>

                                                    </select>
                                                    <i class="input-icon material-icons">school</i>
                                                </div>
                                                <input type="submit" name="btnRegister" class="btn" value="Register"></input>

                                            </div>
                                        </div>