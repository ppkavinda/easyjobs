<div class="banner">
	<div class="container">
		<div id="search_wrapper">
		    <div id="search_form" class="clearfix">
		        <h1>Start your job search</h1>
                <p>
                    <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
                    <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
                    <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
                </p>
            </div>
	
        </div>
   </div> 
</div>

<style>
.banner{
	background:url(images/banner.jpg)no-repeat center top;
	background-size:cover;
    min-height:630px;	
}
#search_wrapper1{
	margin-top:3em;
}
#search_wrapper {
	padding-top:8em;
}
#search_form h1 {
    color: #222f50;
    font-size: 2em;
    margin-bottom: 10px;
    font-weight:400;
}
#search_wrapper p {
    margin: 20px 0;
}
#search_form input[type="text"]{
    padding: 8px;
    font-size: 0.85em;
    margin: 10px 0;
    border: 1px solid #999;
    color: #999;
    background: none;
    outline: none;
    font-weight: 300;
}
.search_form1 input[type="text"]{
    padding: 8px;
    font-size: 0.85em;
    border: 1px solid #ccc;
    color: #999;
    background: none;
    outline: none;
    font-weight: 300;
    width:50%;
    margin-bottom:20px;
}
#search_form label {
    position: relative;
    z-index: 1;
}
.contact-form label {
	position: relative;
	z-index: 1;
}
.btn2{
	cursor: pointer;
    padding: 8px 10px;
    display: inline-block;
    text-transform: uppercase;
    outline: none;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    font-size: 0.85em;
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -o-border-radius: 2px;
    font-weight: 300;
    margin: 0px;
    vertical-align: baseline;
}
.btn-2{
	background:#2185C5;
	color: #fff;
}
.btn-2 input {
	color: #fff;
}
.btn2-1b:after {
	width: 100%;
	height: 0;
	top: 0;
	left: 0;
	background:#f15f43;
	color:#fff;
	 border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -o-border-radius: 2px;
}
.btn2:after {
	content: '';
	position: absolute;
	z-index: -1;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}
.btn2-1b:hover:after, .btn2-1b:active:after {
	height: 100%;
	color:#fff;
}
#search_form input[type="submit"] {
    -webkit-appearance: none;
    cursor: pointer;
    border: none;
    outline: none;
    background: none;
    text-transform: uppercase;
    font-weight: 400;
}
h2.title {
    font-size: 1.5em;
    border-bottom: none;
    color: #ff821c !important;
    margin: 0;
    margin-bottom: 8px;
    margin-top: 4px;
    padding-bottom: 0;
    font-weight:400;
    text-transform: capitalize;
}
</style>