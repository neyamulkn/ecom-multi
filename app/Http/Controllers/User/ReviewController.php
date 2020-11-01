<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\ReviewImageVideo;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    use CreateSlug;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReviewForm(Request $request)
    {
        $checkPurchase = OrderDetail::where('product_id', $request->product_id)->first();
        $output = '';
        if($checkPurchase){
            $output = view('frontend.review.review');
        }

        return $output;
    }

    //insert product review
    public function productReviewInsert(Request $request)
    {
        $request->validate([
            'review' => 'required'
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->ratting = $request->ratting;
        $review->review = $request->review;

        $save = $review->save();
        if($save){

        //if image set
        if ($request->hasFile('review_image')) {
            $images = $request->file('review_image');
            foreach($images as $image) {
                $new_image_name = $this->uniqueImagePath('review_image_videos', 'review_image', $image->getClientOriginalName());
                $image->move(public_path('upload/review'), $new_image_name);
                $review_image = new ReviewImageVideo();
                $review_image->review_image = $new_image_name;
                $review_image->user_id = Auth::id();
                $review_image->review_id = $review->id;
                $review_image->save();
            }
        }
        //if video set
        if ($request->hasFile('review_video')) {
            $videos = $request->file('review_video');
            foreach($videos as $video) {
                $new_video_name = $this->uniqueImagePath('review_image_videos', 'review_video', $video->getClientOriginalName());
                $video->move(public_path('upload/review'), $new_video_name);
                $review_image = new ReviewImageVideo();
                $review_image->review_video = $new_video_name;
                $review_image->user_id = Auth::id();
                $review_image->review_id = $review->id;
                $review_image->save();

            }
        }
            Toastr::success('Thanks for your review.');
        }else{
            Toastr::error('Sorry your review sending failed.!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }

}
