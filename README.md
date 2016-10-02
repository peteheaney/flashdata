# Flashdata

Flashdata is an ExpressionEngine plugin that allows you to create and retrieve a session variable that will expire after one page load.

## Installation

Copy the `flashdata` folder to `system/expressionengine/third_party` on your server.

## Usage

#### Set a Flashdata variable

`{exp:flashdata:set name="greeting" value="hello"}`

Creates a session variable named 'greeting' with the value 'hello' that will expire after one page load.

#### Retrieve a Flashdata variable

`{exp:flashdata:get name="greeting"}`

If one or fewer page loads have occurred since the flashdata variable was set, returns the value of the session variable with the name 'greeting'.

#### Retrieve a Flashdata variable using a tag pair

```
{exp:flashdata:get name="greeting"}
	{if flashdata == "hello"}
		The greeting says {flashdata}
	{if:else}
		No greeting for you!
	{/if}
{/exp:flashdata:get}
```

Inside the tag pair `{exp:flashdata:get name="greeting"} ... {/exp:flashdata:get}`, the `{flashdata}` tag will be replaced by the value of the session variable with the name 'greeting'.

## License

AnyLink is released under the MIT license. For more information, see [License](https://github.com/peteheaney/anylink/blob/master/LICENSE).
