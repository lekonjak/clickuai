{include file="search/header.tpl"}
  <body>
    <div class="top-bar">
        <div class="logo-home">
            <img src="" height="40px" width="100px" border="0" alt="logo" role="logo">
        </div>
        <div class="search-box">
            <form role="form" name="search" id="search-form" action="{$form_action}" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="search-field" name="qsearch" placeholder="Pesquisar">
              </div>
            </form>
        </div>
    </div>
    <div class="search-results">
        <div class="columns">
            <div class="left">
                {include file="search/left.tpl"}
            </div>
            <div class="center">
                {include file="search/center.tpl"}
            </div>
            <div class="right">
                {include file="search/right.tpl"}
            </div>
        </div>  
    </div>
{include file="search/footer.tpl"}