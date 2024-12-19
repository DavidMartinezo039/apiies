<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    // Listar todos los comentarios
    public function index()
    {
        return CommentResource::collection(Comment::with('user', 'product')->paginate());
    }

    // Crear un nuevo comentario
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());

        return new CommentResource($comment);
    }

    // Mostrar un comentario específico
    public function show(Comment $comment)
    {
        return new CommentResource($comment->load('user', 'product'));
    }

    // Actualizar un comentario
    public function update(StoreCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return new CommentResource($comment);
    }

    // Eliminar un comentario
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->noContent();
    }
}
