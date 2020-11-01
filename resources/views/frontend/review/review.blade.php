@section('perpage-css')
    <style type="text/css">
    .star-cb-group {
      /* remove inline-block whitespace */
      font-size: 0;
      /* flip the order so we can use the + and ~ combinators */
      unicode-bidi: bidi-override;
      direction: rtl;
      /* the hidden clearer */
    }
    .star-cb-group * {
      font-size: 3rem;
    }
    .star-cb-group > input {
      display: none;
    }
    .star-cb-group > input + label {
      /* only enough room for the star */
      display: inline-block;
      text-indent: 9999px;
      width: 1em;
      white-space: nowrap;
      cursor: pointer;
    }
    .star-cb-group > input + label:before {
      display: inline-block;
      text-indent: -9999px;
      content: "☆";
      color: #888;
    }
    .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
      content: "★";
      color: #ffa500;
      text-shadow: 0 0 1px #333;
    }
    .star-cb-group > .star-cb-clear + label {
      text-indent: -9999px;
      width: .5em;
      margin-left: -.5em;
    }
    .star-cb-group > .star-cb-clear + label:before {
      width: .5em;
    }
    .star-cb-group:hover > input + label:before {
      content: "☆";
      color: #888;
      text-shadow: none;
    }
    .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
      content: "★";
      color: #ffa500;
      text-shadow: 0 0 1px #333;
    }

    .rating-success{display:none;
        text-align: center;
        font-size: 20px;
        padding: 30px 0;}
    .rating-success.active{display:block}

    .rating-form input.text-field{display:block;width:100%;line-height:25px;font-size:14px;padding:0 10px;border:solid 1px #c1c1c1;}

    .rating-form #review{width:100%;padding:0 10px;line-height:25px;font-size:14px;height:100px;border:solid 1px #c1c1c1;}

    .rating-form #submit{width:100px;line-height:30px;font-size:14px;border-radius:0;-webkit-appearance:none;background: #467379;color: white;border:none;outline:none;}

    .error{padding-left:20px;color:red;font-size:12px;}
    </style>
@endsection
<div class="modal fade" id="reviewModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Review this product</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-top: -25px;">&times;</button>
            </div>
            <form action="{{route('review.insert')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                    @csrf
                   <div class='rating-box'>
                        <p>Please Rate This Product</p>
                          <fieldset>
                            <span class="star-cb-group">
                              <input type="radio" id="rating-5" name="ratting" value="5" /><label for="rating-5" title="5 Star">5</label>
                              <input type="radio" id="rating-4" name="ratting" value="4" /><label for="rating-4" title="4 Star">4</label>
                              <input type="radio" id="rating-3" name="ratting" value="3" /><label for="rating-3" title="3 Star">3</label>
                              <input type="radio" id="rating-2" name="ratting" value="2" /><label for="rating-2" title="2 Star">2</label>
                              <input type="radio" id="rating-1" name="ratting" value="1" /><label for="rating-1" title="1 Star">1</label>
                              <input type="radio" id="rating-0" name="ratting" value="0" checked="checked" class="star-cb-clear" /><label for="rating-0">0</label>
                            </span>
                          </fieldset>
                    </div>
                    <div class="form-group">
                        <p>Write Your Review</p>
                        <textarea name="review" required rows="3" style="resize: vertical;" class="form-control"></textarea>
                       
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <span>Add Image</span>
                        <input type="file" name="review_image[]" multiple="multiple" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <span>Add Video</span>
                        <input type="file"  name="review_video[]" multiple="multiple" class="form-control">
                    </div>
                     </div>
                </div>

                <div class="modal-footer">
                   <button type="submit" class="button mid dark">Publish Review</button>
                </div>
            </form>
        </div>
    </div>
</div>