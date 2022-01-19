<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Story\StoryRequest;
use App\Models\Story;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StoryController extends AdminBaseController
{
    /**
     * This function loads the page of stories images
     * @return View
     */
    public function index()
    {
        return view('admin.stories.stories-list');
    }

    /**
     * This function saves(creates/updates) the story data
     * @param StoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveStory(StoryRequest $request)
    {
        try {
            $preFile = $request->pre_image;
            $hasFile = $request->hasFile('image');
            $imageFile = $request->file('image');
            $storyImage = MediaService::saveMedia($imageFile,$hasFile,$preFile);
            $story = [
                'title' => $request->title,
                'link' => $request->link,
                'image' => $storyImage,
            ];
            Story::updateOrCreate(['id' =>  $request->id], $story);
            return ResponseHelper::successResponse(__('Story saved successfully'));
        }catch (\Exception $exception){
            return ResponseHelper::errorResponse($exception->getMessage(),201);
        }
    }

    /**
     * This function returns the list of stories
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function listStories(Request $request)
    {
        $stories = Story::listStories($request);
        return datatables($stories)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the story data permanently
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStory(Request $request)
    {
        try{
            $story = Story::findOrFail($request->id);
            $image = $story->image;
            $fullImagePath = Config::get('constants.paths.media').$image;
            MediaService::deleteFile($fullImagePath);
            $story->delete();
            return ResponseHelper::successResponse(__('Story deleted successfully'));
        }catch(\Exception $exception){
            return ResponseHelper::errorResponse("Some errors occurred ". $exception->getMessage(),201);
        }
    }

    /**
     * This function finds the story info
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStoryInfo(Request $request)
    {
        try{
            $story = Story::findOrFail($request->id);
            return ResponseHelper::successResponse('Data retuned successfully', $story);
        }catch(\Exception $exception){
            return ResponseHelper::errorResponse("Some errors occurred ". $exception->getMessage(),201);
        }
    }
}
