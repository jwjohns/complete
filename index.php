<html style="background-color:black;"> 
    <head>
        <style>
            #floating-panel {
              position: absolute;
              top: 15px;
              right: 1.4%;
              z-index: 5;
              background-color: #fff;
              padding: 5px;
              border: 1px solid #999;
              text-align: center;
              font-family: 'Roboto','sans-serif';
              line-height: 30px;
              padding-left: 10px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="markers.js"></script>
        <script src="script.js"></script>
    </head>
    <body>

        <div id="floating-panel">
            <form method="POST" id="contactForm" enctype="multipart/form-data">
            <p>upload csv</p>
            <input type="file" id="csv" name="csv" />
            <p>select col names</p>
            <p>Column 1: 
                <select name="col1">
                    <option value="Street">Street</option>
                    <option value="City">City</option>
                    <option value="State">State</option>
                    <option value="Zip">Zip</option>
                    <option value="Category">Category</option>
                </select>
            </p>
            <p>Column 2: 
                <select name="col2">
                    <option value="Street">Street</option>
                    <option value="City">City</option>
                    <option value="State">State</option>
                    <option value="Zip">Zip</option>
                    <option value="Category">Category</option>
                </select>
            </p>
            <p>Column 3: 
                <select name="col3">
                    <option value="Street">Street</option>
                    <option value="City">City</option>
                    <option value="State">State</option>
                    <option value="Zip">Zip</option>
                    <option value="Category">Category</option>
                </select>
            </p>
            <p>Column 4: 
                <select name="col4">
                    <option value="Street">Street</option>
                    <option value="City">City</option>
                    <option value="State">State</option>
                    <option value="Zip">Zip</option>
                    <option value="Category">Category</option>
                </select>
            </p>
            <p>Column 5: 
                <select name="col5">
                    <option value="Street">Street</option>
                    <option value="City">City</option>
                    <option value="State">State</option>
                    <option value="Zip">Zip</option>
                    <option value="Category">Category</option>
                </select>
            </p>

            <input type="submit" id="submitBtn" name="submit" value="Generate Map" /></form>
        </div>
        
        <div id="map" style="width: 100%; height: 100%;"><img id="gif" style="position:relative;top:10%;left:25%;visibility:hidden;z-index:-20;"src="load.gif" alt="loader gif image" /></div>

        <script src="//maps.googleapis.com/maps/api/js??v=3.exp&sensor=false"></script>
    </body>
<html>
