
<div class="bt-switch">

    <h4>With Long Text</h4>
    <p class="text-muted font-13">Just add <code>data-on-text="Long Text"</code> & <code>data-off-text="Long Text"</code> to the <code>&lt;input type="checkbox"...&gt;</code>.</p>
    <div class="m-b-30">
        <input type="checkbox" checked data-on-color="warning" data-off-color="danger" data-on-text="Enabled" data-off-text="Disabled"> 
    </div>

    <h4>With Long Text</h4>
    <p class="text-muted font-13">Just add <code>data-on-text="Long Text"</code> & <code>data-off-text="Long Text"</code> to the <code>&lt;input type="checkbox"...&gt;</code>.</p>
    <div class="m-b-30">
        <input type="checkbox" checked data-on-color="warning" data-off-color="danger" data-on-text="Enabled" data-off-text="Disabled"> 
    </div>

    <h4>With Long Text</h4>
    <p class="text-muted font-13">Just add <code>data-on-text="Long Text"</code> & <code>data-off-text="Long Text"</code> to the <code>&lt;input type="checkbox"...&gt;</code>.</p>
    <div class="m-b-30">
        <input type="checkbox" checked data-on-color="warning" data-off-color="danger" data-on-text="Enabled" data-off-text="Disabled"> 
    </div>

    <h4>With Long Text</h4>
    <p class="text-muted font-13">Just add <code>data-on-text="Long Text"</code> & <code>data-off-text="Long Text"</code> to the <code>&lt;input type="checkbox"...&gt;</code>.</p>
    <div class="m-b-30">
        <input type="checkbox" checked data-on-color="warning" data-off-color="danger" data-on-text="Enabled" data-off-text="Disabled"> 
    </div>
    
</div>

    <!-- bt-switch -->
    <script src="{{asset('assets')}}/node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>