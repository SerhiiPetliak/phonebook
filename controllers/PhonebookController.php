<?php

namespace app\controllers;

use Yii;
use app\models\Phonebook;
use app\models\PhonebookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Address; 

/**
 * PhonebookController implements the CRUD actions for Phonebook model.
 */
class PhonebookController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','update', 'delete', 'view', 'create'],
                'rules' => [
                    [
                    'allow' => false,
                    'roles' => ['?'],
                    ],
                    [
                    'allow' => true,
                    'roles' => ['@'],
                    ],
                ],
            ],
        'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Phonebook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhonebookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Phonebook model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Phonebook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Phonebook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Phonebook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $old = $this->findModel($id);

        $dt = Yii::$app->request->get();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(isset($dt['idc'])){
                $md = Address::findOne($dt['idc']);
                $md->is_active = 2;
                $md->save();
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            if(isset($dt['idc'])){

                $nmodel = Address::findOne($dt['idc']);

                $model->unitName = $nmodel->unitName;
                $model->facultyName = $nmodel->facultyName;
                $model->post = $nmodel->post;
                $model->PIB = $nmodel->PIB;
                $model->telephoneOut = $nmodel->telephoneOut;
                $model->telephoneIn = $nmodel->telephoneIn;
                $model->telephoneForward = $nmodel->telephoneForward;
                $model->email = $nmodel->email;
                $model->corps = $nmodel->corps;
                $model->cabinet = $nmodel->cabinet;
            }

            return $this->render('update', [
                'model' => $model,
                'old' => $old
            ]);
        }
    }

    /**
     * Deletes an existing Phonebook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Phonebook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Phonebook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Phonebook::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
