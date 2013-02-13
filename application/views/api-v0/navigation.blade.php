        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="{{ URI::is('/api/v0/forum') ? 'active' : '' }}"><a href="/api/v0/forum">Forum</a></li>
              <ul>
                <li class="{{ URI::is('/api/v0/forum#get') ? 'active' : '' }}"><a href="/api/v0/forum#get">GET</a></li>
              </ul>
              <li class="{{ URI::is('/api/v0/stat') ? 'active' : '' }}"><a href="/api/v0/stat">Stat</a></li>
              <ul>
                <li class="{{ URI::is('/api/v0/stat#get') ? 'active' : '' }}"><a href="/api/v0/stat#get">GET</a></li>
              </ul>
              <li class="{{ URI::is('/api/v0/topic') ? 'active' : '' }}"><a href="/api/v0/topic">Topic</a></li>
              <ul>
                <li class="{{ URI::is('/api/v0/topic#get') ? 'active' : '' }}"><a href="/api/v0/topic#get">GET</a></li>
              </ul>
              <li class="{{ URI::is('/api/v0/user') ? 'active' : '' }}"><a href="/api/v0/user">User</a></li>
              <ul>
                <li class="{{ URI::is('/api/v0/user#get') ? 'active' : '' }}"><a href="/api/v0/user#get">GET</a></li>
              </ul>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
