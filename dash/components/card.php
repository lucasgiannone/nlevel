<div style='display: inline-block;' class="col-sm-6 col-xl-4 p-3">
    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
        <img class="card-img-top" src="<?=$cardimg?>" alt="Card image">
        <div class="app-card-header p-3">
            <div class="row align-items-center gx-3">
                <div class="col-auto">
                    <!-- ICONE -->
                    <div class="app-icon-holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                    </svg>
                    </div>
                </div> <!-- COL -->
                <div class="col-auto">
                    <!-- TITULO -->
                    <h4 class="app-card-title"><?=$cardtitle?></h4>
                </div> <!-- COL -->
            </div> <!-- LINHA -->
        </div><!-- CARD HEADER -->
        <div class="app-card-body px-3">
            <div class="intro"><?=$carddesc?></div>
            <p class="card-text mt-3"><small class="text-muted"><?=$carddate?></small></p>
        </div><!-- CARD BODY -->
        <div class="app-card-footer p-4 mt-auto">
            <a class="btn app-btn-secondary" href="#">Ver conteúdo programado</a>
        </div><!-- CARD FOOTER -->
    </div>
</div>