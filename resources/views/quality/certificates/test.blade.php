<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <title>CSS Table Rowspan Demo</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type='text/css'>
.tablewrapper {
  position: relative;
}
.table {
  display: table;
}
.row {
  display: table-row;
}
.cell {
  display: table-cell;
  border: 1px solid red;
  padding: 1em;
}
.cell.empty
{
  border: none;
  width: 100px;
}
.cell.rowspanned {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100px;
}
</style>

  </head>
  <body>
    <div class="tablewrapper">
      <div class="table">
        <div class="row">
          {{-- <div class="cell">
            Top left
          </div> --}}
          <div class="rowspanned cell">
            Center
          </div>
          <div class="cell">
            Top right
          </div>
        </div>
        <div class="row">
          {{-- <div class="cell">
            Bottom left
          </div> --}}
          <div class="empty cell"></div>
          <div class="cell">
            Bottom right
          </div>
        </div>
      </div>
    </div>
  </body>
</html>