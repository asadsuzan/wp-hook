📌 Understanding WordPress Hooks: Actions and Filters

WordPress hooks are a powerful mechanism that allow developers to extend, modify, or customize WordPress core functionality without editing core files. There are two main types:

- ✅ Actions
- ✅ Filters

These hooks help make WordPress modular and developer-friendly.

✅ 1. Action Hooks

🔹 What is an Action?
An Action hook allows you to execute custom functions at specific points during WordPress execution. Use actions when you want to perform side effects, such as enqueueing scripts, sending emails, or modifying the database.

🔸 How WordPress Uses Actions
do_action( 'wp_footer' );

➡️ This line is in footer.php and allows developers to inject code into the footer area of the page.

🔸 How to Use Actions
add_action( 'wp_footer', 'add_custom_footer_text' );

function add_custom_footer_text() {
    echo '<p style="text-align: center;">© ' . date('Y') . ' My Website. All rights reserved.</p>';
}

➡️ Outputs a custom message in the footer.

🔸 Creating Custom Actions
Step 1: Trigger Your Custom Action
do_action( 'custom_hook_point', $arg1, $arg2 );

Step 2: Hook Into It
add_action( 'custom_hook_point', 'my_custom_function', 10, 2 );

function my_custom_function( $arg1, $arg2 ) {
    // Do something with $arg1 and $arg2
}

✅ 2. Filter Hooks

🔹 What is a Filter?
A Filter hook is used to modify and return data during WordPress execution. Filters are best when you need to change content or values before they are used or displayed.

🔸 How WordPress Uses Filters
$title = apply_filters( 'the_title', $title );

➡️ This lets developers modify post titles before they are displayed.

🔸 How to Use Filters
add_filter( 'the_title', 'change_post_title' );

function change_post_title( $title ) {
    if ( is_singular() ) {
        $title .= ' 📝';
    }
    return $title;
}

➡️ Adds an emoji to post titles on single post pages.

🔸 Creating Custom Filters
Step 1: Apply Your Custom Filter
$name = apply_filters( 'custom_user_name', $name );

Step 2: Hook Into It
add_filter( 'custom_user_name', 'uppercase_user_name' );

function uppercase_user_name( $name ) {
    return strtoupper( $name );
}

➡️ Transforms the user name to uppercase.

✅ Action vs Filter: Key Differences

Feature       | Action Hook                  | Filter Hook
--------------|------------------------------|-------------------------------
Purpose       | Perform side effects         | Modify and return data
Return Value  | ❌ No need to return          | ✅ Must return modified data
Core Function | do_action()                  | apply_filters()
Use Case      | Enqueue script, send email   | Modify title, excerpt, content

✅ Parameters: Priority & Accepted Arguments

Both add_action() and add_filter() use the same function signature:
add_action( 'hook_name', 'callback_function', $priority, $accepted_args );
add_filter( 'hook_name', 'callback_function', $priority, $accepted_args );

- priority: Lower number runs earlier (default 10)
- accepted_args: How many arguments your callback accepts

✅ Real-World Example: Enqueue a Script with Action
add_action( 'wp_enqueue_scripts', 'enqueue_custom_js' );

function enqueue_custom_js() {
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/custom.js', [], '1.0', true );
}

✅ Real-World Example: Change Excerpt Length with Filter
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function custom_excerpt_length( $length ) {
    return 20; // 20 words
}

✅ Bonus: Remove a Hook
remove_action( 'hook_name', 'callback_function', $priority );
remove_filter( 'hook_name', 'callback_function', $priority );

✅ Summary Table

Hook Type | Use When You...              | Trigger Function   | Hooking Function
----------|------------------------------|--------------------|---------------------
Action    | Want to perform side effects | do_action()        | add_action()
Filter    | Want to change/return value  | apply_filters()    | add_filter()


