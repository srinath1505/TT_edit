

<section class="section second-section ic-sayfa-baslik">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-9" >
                <h2 class="bdc-head"><?= $menuDetail->title ?></h2>
            </div>
            <div class="col-lg-3">
                <p class="bdc-txt pt-2">Home / <?= $menuDetail->title ?></p>
            </div>
        </div>
    </div>
</section>
<section id="subhero" class="subhero" style="padding:10px 0px;">
    <div class="container">
        <div class="row d-flex align-items-center investmenrow ">
     
            <div class=" <?= $menuDetail->colums_count == 1 ? 'col-lg-12 ' : 'col-lg-6 ' ?> d-flex  justify-content-center">
                <div class="block-head">
                        <p class="fs-6">
                        <?= $menuDetail->content ?>
                        </p>
                </div>
            </div>
            
            <?php 
            if($menuDetail->image){
                $className = $menuDetail->colums_count == 1  ? 'col-sm-12' : 'col-lg-6';
                echo'<div class="  '.$className.' mt-5">
                    <img src=" '.$get->assets_url.'/'.$menuDetail->image.' " class="img-fluid  shadow-sm" alt="'.$menuDetail->title.'" />
                </div>' ;
            }
            ?>
        </div>
    </div>
</section>


