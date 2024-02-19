<?php include "assets/parts/header.php"; ?>
<?php include "assets/parts/nav.php"; ?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mt-auto align-content-center">
                    <form id="contact-us" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name/Lastname</label>
                            <input required type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label required for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <script>

                        function addContactUs()
                        {
                            $("#message").hide();

                            let name = $("#name").val();
                            let phone = $("#phone").val();
                            let email = $("#email").val();

                            $.ajax({
                                url: "assets/functions/functions.php",
                                type: "POST",
                                data: {
                                    "addContactUs":"1",
                                    name: name,
                                    email: email,
                                    phone: phone,
                                },
                                success: function(response) {
                                    alert('Message sent successfully');
                                    // $("#message").show();
                                }/*,
                    error: function(xhr) {
                        alert('error happend'+xhr.responseText
                    }*/
                            });
                        }

                        $('#contact-us').on('submit', function(e) {
                            e.preventDefault();
                            addContactUs();
                        });

                    </script>
                </div>
            </div>
        </div>
    </section>
    <?php include "assets/parts/footer.php"; ?>