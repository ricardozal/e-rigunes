<div class="row justify-content-center mx-0">

    <div class="col-md-10  mt-1  d-flex align-items-center justify-content-center" id="contact">
        <div class="card w-75 mb-5 mt-2 border-0" style="border-radius: 30px">
            <div class="card-body">
                <form id="form-contact" action="" method="POST">
                    @csrf

                    <div class="row text-center">
                        <div class="col-12 mb-5">
                            <h2 class="color-gray-dark font-family-2">Contacto</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control mb-4" placeholder="Nombre">
                            </div>
                        </div>


                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" class="form-control mb-4"
                                       placeholder="Teléfono">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control mb-4"
                                       placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control rounded-0" name="description" id="description" rows="3"
                                          placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-12">
                            <button id="btn-contact-send"
                                    class="btn btn-primary  text-bold color-white">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>