<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>admin/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Template</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?=base_url()?>admin/add-template">Add Template</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url().'admin/all-templates';?>">All Templates</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=base_url().'admin/canvas-all-templates';?>">Canvas Templates</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>admin/category">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Catrgory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>admin/category-group">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Grouping</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User's</span>
            </a>
          </li>
        </ul>
      </nav>