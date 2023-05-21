<div id="main">
    @livewireStyles
    {{-- <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style> --}}
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ session::get('message') }}</div>
                @endif
                <div class="panel panel-default" id="donationPanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-active" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">Add New Donation</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">Add New Province</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">Add New Demand</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-add btn-success">See All Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-c" enctype="multipart/form-data" wire:submit.prevent="addDonation">
                            <div class="form-g">
                                <label class="col-md-4 control-label">Donation Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Donation Name" class="form-control input-md" wire:model="donationType"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Needed Donation Amount</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Needed Donation Amount" class="form-control input-md" wire:model="neededDonationMoney"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Donated Money</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Donated Money" class="form-control input-md" wire:model="donatedMoney"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Stock" class="form-control input-md" wire:model="stock"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                    @endif
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-add btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default" id="provincePanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-nav" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">Add New Donation</button>
                                <button class="btn btn-active" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">Add New Province</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">Add New Demand</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-add btn-success">See All Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        
                        <form class="form-horizontal form-c" enctype="multipart/form-data" wire:submit.prevent="addProvince">
                            <div class="form-g">
                                <label class="col-md-4 control-label">Province Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Province Name" class="form-control input-md" wire:model="provinceName"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-add btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default" id="demandPanel" wire:ignore>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-nav" style="border-radius: 5px 0px 0px 5px !important;" onclick="donationPanel()">Add New Donation</button>
                                <button class="btn btn-nav" style="margin-left:-5px; border-radius:0px !important;" onclick="provincePanel()">Add New Province</button>
                                <button class="btn btn-active" style="margin-left:-5px; border-radius: 0px 5px 5px 0px !important;" onclick="demandPanel()">Add New Demand</button>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-add btn-success">See All Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-c" enctype="multipart/form-data" wire:submit.prevent="addDemand">

                            <div class="form-g">
                                <label class="col-md-4 control-label">Demanding Province Name</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="provinceName">
                                        <option value="">Select Province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->provinceName }}">{{ $province->provinceName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Demanding Donation</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="donationType">
                                        <option value="">Select Donation</option>
                                        @foreach($donations as $donation)
                                            <option value="{{ $donation->donationType }}">{{ $donation->donationType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label">Amount</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Amount" class="form-control input-md" wire:model="amount"/>
                                </div>
                            </div>

                            <div class="form-g">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-add btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
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


