<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\IdeaResource;
use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $query = Idea::withCount('votes')
            ->addSelect(['voted_by_user' => Vote::select('id')
                ->where('user_id', Auth::id())
                ->whereColumn('idea_id', 'ideas.id')
            ])
            ->orderBy('id', 'desc')
            ->simplePaginate(Idea::PAGINATION_COUNT);

        $ideasCollection = IdeaResource::collection($query);

        return response()->json([
            'success' => true,
            'message' => 'Get list of ideas',
            'data' => $ideasCollection
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show($slug)
    {
        $idea = Idea::where('slug', $slug)->withCount('votes')->first();
        return new IdeaResource($idea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
