<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Post;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    public function actionIndex()
    {
        $posts = Post::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('index', ['posts' => $posts]);
    }

    public function actionView($id)
    {
        $post = Post::findOne($id);
        return $this->render('view', ['post' => $post]);
    }
    public function actionCreate(){

        $post= new Post();

        if ($post->load(Yii::$app->request->post()) ){

            $post->author_id = Yii::$app->user->id;
            $post->author = Yii::$app->user->identity->username;

           if ($post->save()) {
                return $this->redirect(['view', 'id' => $post->id]);
            } else {
                \Yii::error($post->errors, __METHOD__);   // log errors
                var_dump($post->errors); die;             // show errors on screen
            }

        }

        return $this->render('create',['post'=>$post]);

    }

    public function actionUpdate($id){

        $post = Post::findOne($id);

        if(!$post){
            throw new NotFoundHttpException('post not found');
        }
        
         if ($post->load(Yii::$app->request->post()) && $post->save() ){
                return $this->redirect(['view', 'id' => $post->id]);

         }

        return $this->render('update', ['post' => $post]);
    }

    public function actionDelete($id){

        $post = Post::findOne($id);

        if(!$post){
            throw new NotFoundHttpException('post not found');
        }

    
        $post->delete();

        return $this->redirect(['index']);
    }
}
