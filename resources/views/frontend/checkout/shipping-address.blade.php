<div class="form-group" >
	<strong><i class="fa fa-user"></i></strong> {{$get_shipping->name}}
</div>

<div class="form-group" >
    <strong><i class="fa fa-envelope"></i></strong> {{$get_shipping->email}}
</div>
<div class="form-group" >
    <strong><i class="fa fa-phone"></i></strong> {{$get_shipping->phone}}
</div>
<div class="form-group" >
    <strong><i class="fa fa-map-marker"></i></strong>
    {{
        $get_shipping->address .', '.
        $get_shipping->get_area->name .', '.
        $get_shipping->get_city->name .', '.
        $get_shipping->get_state->name
    }}
</div>