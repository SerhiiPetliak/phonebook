<?php

namespace app\controllers;

use Yii;
use app\models\Address;
use app\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Phonebook;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','update', 'delete', 'view'],
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Address models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Address model.
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
     * Displays a single Address model.
     * @param integer $id
     * @return mixed
     */
    public function actionOk($id)
    {
        return $this->render('ok', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Address();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if(Yii::$app->user->isGuest){
                return $this->redirect(['ok', 'id' => $model->id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $nmodel = new Phonebook;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $nmodel->unitName = $model->unitName;
            $nmodel->facultyName = $model->facultyName;
            $nmodel->post = $model->post;
            $nmodel->PIB = $model->PIB;
            $nmodel->telephoneOut = $model->telephoneOut;
            $nmodel->telephoneIn = $model->telephoneIn;
            $nmodel->telephoneForward = $model->telephoneForward;
            $nmodel->email = $model->email;
            $nmodel->corps = $model->corps;
            $nmodel->cabinet = $model->cabinet;

            $nmodel->insert();


            $model->is_active = 2;
            $model->save();



            /*var_dump($model);
            var_dump($nmodel);
            exit;*/

            if(Yii::$app->user->isGuest){
                return $this->redirect(['ok', 'id' => $model->id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Address model.
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
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
