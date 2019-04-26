<?php

echo "
<div class='portfolio-item item'>

        <a class='portfolio-link' data-toggle='modal' href='#portfolioModal" . $picture['id'] . "'>
            <div class='portfolio-hover'>
                <div class='portfolio-hover-content'>
                    <i class='fas fa-plus fa-3x'></i>
                </div>
            </div>
            
            <img class='img-fluid' src=\"" . $picture['imgFilePath'] . "\"alt=''>
            
        </a>
      </div>";
