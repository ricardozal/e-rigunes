<div class="col-xl-3 col-md-6 pt-3">
    <div class="card-dashboard card-stats" style="background-color: #5DADE2">
        <div class="card-body">
            <div class="row">
                <div class="col" id="buyerNum" name="buyerNum">
                    <h6 class="card-title text-muted mb-0"> Compradores</h6>
                    <input type="hidden" value="{{route('admin_dashboard_buyer')}}" name="numBuyerH" id="numBuyerH">
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape rounded-circle" style="background-color: #21618C">
                        <i class="fas fa-shopping-cart" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 pt-3">
    <div class="card-dashboard card-stats" style="background-color: #45B39D">
        <div class="card-body">
            <div class="row">
                <div class="col" id="entryCont" name="entryCont">
                    <h5 class="card-title text-muted mb-0"> Ingresos</h5>
                    <input type="hidden" value="{{route('admin_dashboard_entry')}}" name="entry" id="entry">
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape rounded-circle" style="background-color: #239B56">
                        <i class="fas fa-chart-line" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 pt-3">
    <div class="card-dashboard card-stats" style="background-color: #E74C3C">
        <div class="card-body">
            <div class="row">
                <div class="col" id="expensesCont" name="expensesCont">
                    <h5 class="card-title text-muted mb-0"> Egresos</h5>
                    <input type="hidden" value="{{route('admin_dashboard_expenses')}}" name="expenses" id="expenses">
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape rounded-circle" style="background-color: #CB4335">
                        <i class="fas fa-wallet" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
