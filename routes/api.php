<?php

use App\Models\ContentBlock;
use App\Models\Skill;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Type;
use App\Models\User;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * Route to get all types
 */
Route::get('/types', function(){

    $types = Type::orderBy('title')->get();
    return $types;

});
/**
 * Route to get all projects
 */
Route::get('/projects', function(){

    $projects = Project::orderBy('created_at')->get();

    foreach($projects as $key => $project)
    {
        $projects[$key]['user'] = User::where('id', $project['user_id'])->first();
        $projects[$key]['type'] = Type::where('id', $project['type_id'])->first();

        if($project['image'])
        {
            $projects[$key]['image'] =  $project['image'];
        }
    }

    return $projects;

});
/**
 * Route to get a project by slug
 */
Route::get('/projects/profile/{project?}', function(Project $project){

    $project['user'] = User::where('id', $project['user_id'])->first();
    $project['type'] = Type::where('id', $project['type_id'])->first();

    return $project;

});

/**
 * Route to get all content blocks
 */
Route::get('/content-blocks', function(){

    $content_blocks = ContentBlock::orderBy('created_at')->get();

    foreach($content_blocks as $key => $content_block)
    {

        if($content_block['image'])
        {
            $content_blocks[$key]['image'] =  $content_block['image'];
        }
    }

    return $content_blocks;

});

/**
 * Route to get a single content block by type
 */
Route::get('/content-blocks/{content_block:type}', function(ContentBlock $content_block){
    return $content_block;
});

/**
 * Route to get all social media
 */
Route::get('/social-media-links', function(){

    $social_media = SocialMedia::orderBy('created_at')->get();

    foreach($social_media as $key => $media)
    {

        if($media['image'])
        {
            $social_media[$key]['image'] =  $media['image'];
        }
    }

    return $social_media;

});
/**
 * Route to get a single social media
 */
Route::get('/social-media-link/{social_media:id}', function(SocialMedia $social_media){

    return $social_media;

});
/**
 * Route to get all skills
 */
Route::get('/skill-links', function(){

    $skills = Skill::orderBy('created_at')->get();

    foreach($skills as $key => $media)
    {

        if($media['image'])
        {
            $skills[$key]['image'] = $media['image'];
        }
    }

    return $skills;

});
/**
 * Route to get a single skill
 */
Route::get('/skill-link/{skills:id}', function(Skill $skills){

    return $skills;

});
