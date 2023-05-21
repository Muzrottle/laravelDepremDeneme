<div id="main">
    @livewireStyles
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ session::get('message') }}</div>
                @endif
                <div class="panel panel-default" id="donationPanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-active" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">All Donations</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">All Provinces</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">All Demands</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.adddonation') }}" class="btn btn-add btn-success">Add New Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Donation Name</th>
                                    <th>Needed Donation</th>
                                    <th>Donated Money</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forEach($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->id }}</td>
                                        <td><img src="{{ asset('images') }}/{{ $donation->image }}" width="60"></td>
                                        <td>{{ $donation->donationType }}</td>
                                        <td>{{ $donation->neededDonationMoney }}</td>
                                        <td>{{ $donation->donatedMoney }}</td>
                                        <td>{{ $donation->stock }}</td>
                                        <td>
                                            <a href="#"><i class="fa fa-times fa-2x text-danger" wire:click.prevent="deleteDonationType({{ $donation->id }})"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $donations->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                <div class="panel panel-default" id="provincePanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-nav" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">All Donations</button>
                                <button class="btn btn-active" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">All Provinces</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">All Demands</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.adddonation') }}" class="btn btn-add btn-success">Add New Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Province Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forEach($provinces as $province)
                                    <tr>
                                        <td>{{ $province->id }}</td>
                                        <td>{{ $province->provinceName }}</td>
                                        <td>
                                            <a href="#"><i class="fa fa-times fa-2x text-danger" wire:click.prevent="deleteProvince({{ $province->id }})"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $donations->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                <div class="panel panel-default" id="demandPanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-nav" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">All Donations</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">All Provinces</button>
                                <button class="btn btn-active" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">All Demands</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.adddonation') }}" class="btn btn-add btn-success">Add New Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Province Name</th>
                                    <th>Donation Type</th>
                                    <th>Amount</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($province_needs as $province_need)
                                    <tr>
                                        <td>{{ $province_need->id }}</td>
                                        <td>{{ $province_need->provinceName }}</td>
                                        <td>{{ $province_need->donationType }}</td>
                                        <td>{{ $province_need->amount }}</td>
                                        <td>{{ $province_need->state }}</td>
                                        <td>
                                            @if($province_need->state == "Waiting")
                                                <a href="#"><i class="fa fa-check fa-2x text-success" wire:click.prevent="approveProvinceNeed({{ $province_need->id }})"></i></a>
                                            @endif
                                            <a href="#" style="margin-left: 5px;"><i class="fa fa-times fa-2x text-danger" wire:click.prevent="deleteProvinceNeed({{ $province_need->id }})"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $donations->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        const donationElement = document.getElementById("donationPanel");
        const provinceElement = document.getElementById("provincePanel");
        const demandElement = document.getElementById("demandPanel");


        function donationPanel()
        {
            donationElement.style.display = "block";
            provinceElement.style.display = "none";
            demandElement.style.display = "none";
        }
        function provincePanel()
        {
            donationElement.style.display = "none";
            provinceElement.style.display = "block";
            demandElement.style.display = "none";
        }
        function demandPanel()
        {
            donationElement.style.display = "none";
            provinceElement.style.display = "none";
            demandElement.style.display = "block";
        }
    </script>
</div>
