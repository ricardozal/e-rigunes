<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">Lista de direcciones</h4>
</div>
<div class="row">
    <div class="container">
        <div class="row mt-5 mx-0">
            <div class="col-12">
                <div class="row pt-5 px-3">
                    <div class="col-12">
                        <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>calle</th>
                                <th>numero exterior</th>
                                <th>número interior</th>
                                <th>colonia</th>
                                <th>codigo postal</th>
                                <th>ciudad</th>
                                <th>estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($address as $address)
                                <tr>
                                    <td>{!! $address->street !!}</td>
                                    <td>{!! $address->ext_num !!}</td>
                                    <td>{!! $address->int_num !!}</td>
                                    <td>{!! $address->colony !!}</td>
                                    <td>{!! $address->zip_code !!}</td>
                                    <td>{!! $address->city !!}</td>
                                    <td>{!! $address->state !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
