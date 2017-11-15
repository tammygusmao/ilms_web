<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\Pesquisas;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */
$this->title = 'Solução encontrada'

?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ( $pesquisa->relator != null ) {   ?>
    <b> DESCRIÇÃO REALIZADA: </b>
    <?= DetailView::widget([
        'model' => $pesquisa,
        'attributes' => [
            'natureza_problema:ntext',
            'relator',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            'palavras_chaves',
            'id_polo',
        ],
    ]); } ?>


    <?php if ( $sol != null ) {   ?>
    <b> SOLUÇÃO APRESENTADA: </b>
    <?= DetailView::widget([
        'model' => $sol,
        'attributes' => [
            'solucao:ntext',
            'palavras_chaves',
            'acao_implementada:ntext',
            'solucao_implementada:ntext',
            'efetividade_acao_implementada:ntext',
            'custos',
            'impacto_pedagogico:ntext',
            'atores_envolvidos',
        ],
    ]); } 

    echo '<b> Similaridade calculada:</b> '.$pesquisa->similaridade;  ?>

    <?php if ( ($pesquisa->id_titulo_problema > 0) && ($exp_resposta != null )) {   ?>

        <?= GridView::widget([
        'dataProvider' => $exp_resposta,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id_tipo_problema',
                'value' => function ($data) {
                        $tipoproblema = TipoProblema::find()->where(['id' => $data->id_tipo_problema])->one();
                        return $tipoproblema->tipo;
                },
            ],
            [
                'attribute' => 'id_titulo_problema',
                'value' => function ($data) {
                        $tituloproblema = TituloProblema::find()->where(['id' => $data->id_titulo_problema])->one();
                        return $tituloproblema->titulo;
                },
            ],
            'descricao_problema',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Ações',
                'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                'template' => '{view}',
                'buttons' => 
                [
                    'view' => function ($url, $model) 
                    {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            ['pesquisas/view', 'id' => $model->id], 
                            [
                                'title' => 'Visualizar',
                                'aria-label' => 'Visualizar',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); } ?>


    <p>
    <b>A solução recomendada ajudou na sua dúvida?</b>

          <?php $url = '?r=pesquisas/newcase&id='.$pesquisa->id_pesquisa; ?>
          
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>

        <?php $link = '?r=pesquisas/update&id='.$pesquisa->id_pesquisa;  ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>

    </p>

</div>
