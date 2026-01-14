<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2: Error Reporting</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        h2 {
            color: #667eea;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        .code-block {
            background-color: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
        }
        .code-block code {
            color: #f8f8f2;
        }
        ul {
            margin-left: 20px;
            margin-top: 10px;
        }
        li {
            margin-bottom: 8px;
        }
        .error-demo {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .note {
            background-color: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 2: Error Reporting in PHP</h1>
        
        <div class="section">
            <h2>1. Understanding error_reporting() Function</h2>
            <p>The <code>error_reporting()</code> function sets which PHP errors are reported.</p>
            
            <h3>Different Ways to Enable/Disable Errors:</h3>
            <ul>
                <li><strong>Disable all errors:</strong> <code>error_reporting(0);</code> or <code>error_reporting(E_NONE);</code></li>
                <li><strong>Report all errors:</strong> <code>error_reporting(E_ALL);</code></li>
                <li><strong>Report all errors except notices:</strong> <code>error_reporting(E_ALL & ~E_NOTICE);</code></li>
                <li><strong>Report only fatal errors:</strong> <code>error_reporting(E_ERROR | E_PARSE);</code></li>
                <li><strong>Report warnings and errors:</strong> <code>error_reporting(E_WARNING | E_ERROR);</code></li>
            </ul>
            
            <h3>Common Error Levels:</h3>
            <ul>
                <li><strong>E_ERROR:</strong> Fatal run-time errors</li>
                <li><strong>E_WARNING:</strong> Run-time warnings</li>
                <li><strong>E_PARSE:</strong> Compile-time parse errors</li>
                <li><strong>E_NOTICE:</strong> Run-time notices</li>
                <li><strong>E_ALL:</strong> All errors and warnings</li>
            </ul>
        </div>
        
        <div class="section">
            <h2>2. Display Errors Configuration</h2>
            <p>The <code>ini_set("display_errors", value)</code> function controls whether errors are displayed.</p>
            
            <ul>
                <li><strong>Enable display:</strong> <code>ini_set("display_errors", 1);</code> or <code>ini_set("display_errors", true);</code></li>
                <li><strong>Disable display:</strong> <code>ini_set("display_errors", 0);</code> or <code>ini_set("display_errors", false);</code></li>
            </ul>
            
            <div class="note">
                <strong>Note:</strong> In production, always set <code>display_errors</code> to 0 and log errors instead using <code>error_log()</code> or <code>ini_set("log_errors", 1)</code>.
            </div>
        </div>
        
        <div class="section">
            <h2>3. Demonstration Code</h2>
            <p>Below is the code from the exercise:</p>
            
            <div class="code-block">
                <code>
&lt;?php<br>
error_reporting(E_ALL);<br>
ini_set("display_errors", 0);<br>
include("file_with_errors.php");<br>
?&gt;
                </code>
            </div>
            
            <h3>What happens:</h3>
            <ul>
                <li><code>error_reporting(E_ALL)</code> - Reports all types of errors</li>
                <li><code>ini_set("display_errors", 0)</code> - Prevents errors from being displayed in the browser</li>
                <li><code>include("file_with_errors.php")</code> - Attempts to include a file that doesn't exist</li>
            </ul>
            
            <div class="error-demo">
                <strong>Result:</strong> The script will fail silently. Errors are reported but not displayed because <code>display_errors</code> is set to 0.
            </div>
        </div>
        
        <div class="section">
            <h2>4. Testing Error Display</h2>
            <p>Try the code below with different settings:</p>
            
            <h3>With display_errors = 0 (Current):</h3>
            <div class="code-block">
                <code>
&lt;?php<br>
error_reporting(E_ALL);<br>
ini_set("display_errors", 0);<br>
echo $undefined_variable; // Error occurs but not displayed<br>
?&gt;
                </code>
            </div>
            
            <h3>With display_errors = 1:</h3>
            <div class="code-block">
                <code>
&lt;?php<br>
error_reporting(E_ALL);<br>
ini_set("display_errors", 1);<br>
echo $undefined_variable; // Error is displayed: "Notice: Undefined variable"<br>
?&gt;
                </code>
            </div>
        </div>
        
        <div class="section">
            <h2>5. Best Practices</h2>
            <ul>
                <li><strong>Development:</strong> Use <code>error_reporting(E_ALL)</code> and <code>ini_set("display_errors", 1)</code></li>
                <li><strong>Production:</strong> Use <code>error_reporting(E_ALL)</code> but set <code>ini_set("display_errors", 0)</code> and enable logging</li>
                <li><strong>Logging:</strong> Use <code>ini_set("log_errors", 1)</code> and <code>ini_set("error_log", "path/to/error.log")</code></li>
            </ul>
        </div>
    </div>
</body>
</html>
