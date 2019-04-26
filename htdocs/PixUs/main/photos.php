<?php

echo "<div class='col-md-4 col-sm-6 portfolio-item'>
        <a class='portfolio-link' data-toggle='modal' href='#portfolioModal" . $picture['id'] . "'>
            <div class='portfolio-hover'>
                <div class='portfolio-hover-content'>
                    <i class='fas fa-plus fa-3x'></i>
                </div>
            </div>
            <img class='img-fluid' src=\"" . $picture['imgFilePath'] . "\"alt=''>
        </a>
      </div>";
