 <header class="top-header">        
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-icon d-xl-none">
                        <i class="bi bi-list"></i>
                    </div>
                    
                    
                    <div class="top-navbar-right ms-3" style="position:absolute;right:10px;">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                    <div class="user-setting d-flex align-items-center gap-1">
                                        <img src="img/pessoas/<?php  if($dadospessoa["foto"]==""){
                                            
                                            echo "profile-pic.jpg";
                                            }else{
                                            echo $dadospessoa["foto"];
                                            
                                        }; ?>" class="user-img" alt="">
                                        <div class="user-name d-none d-sm-block"><?php echo utf8_encode($primeiroNome." ".$ultimoNome);?></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <img src="img/pessoas/<?php  if($dadospessoa["foto"]==""){
                                                    
                                                    echo "profile-pic.jpg";
                                                    }else{
                                                    echo $dadospessoa["foto"];
                                                    
                                                }; ?>" alt="" class="rounded-circle" width="60" height="60">
                                                
                                                <div class="ms-3">
                                                    <h6 class="mb-0 dropdown-user-name"><?php echo utf8_encode($nomeUsuario);?></h6>
                                                    <small class="mb-0 dropdown-user-designation text-secondary"><?php echo  $funcao; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="perfil.php">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                                <div class="setting-text ms-3"><span>Perfil</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                                                <div class="setting-text ms-3"><span>Configurações</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                                <div class="setting-text ms-3"><span>Sair</span></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </div>
                </nav>
            </header>