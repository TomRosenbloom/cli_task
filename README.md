# cli_task

The task should be run (from the src directory) like this:

src> php convert.php filename storagemethod

Where filename is the name of the markdown file to be converted to html, and storagemethod is optional and one of local, ftp, or s3. local will be used as default if none is specified. The markdown file should be placed in the data directory.

The convert script first brings in a configuration file, which sets some config constants e.g. source and destination paths for the markdown and converted html files respectively.

NB this is the part of the task I had most difficulty with and I’m not too happy with the current implementation. I think I’d rather have the config in an ini file (see the example in the config folder) and perhaps have a bootstrapper to construct the directory paths, but that’s rather overcomplicated for the current task. I think constructing the directory paths goes beyond the responsibility of a config file – on the other hand I’m only doing it this way to allow the use of the directory separator constant as I’m running this on Windows but you might not be.

Next I include the Composer autoloader, which I’ve used to load my own classes in addition to the third party libraries I’ve used (the markdown converter and the logger). Then I set some local variables from config, options for the markdown converter, and instantiate the logger. That completes the initialisation phase of the task.

Next I get and validate the filename. I’ve put a bit of logging in here to show that it works. In the real world I’d want to record user details, ip address etc.

Next the conversion – simply a matter of reading in the file, instantiating the converter and running it.

Finally I store the results of the conversion. I’m using strategy pattern to do the storage according to the specified method. This is again where I had a dilemma about config. I’ve hard-coded the storage destination as a property of the StoreLocal method but that’s really bad! This should rather be read from config somewhere within the storageStrategy script, or perhaps passed into the storage method (which would be a kind of dependency injection). Aside from the fact that I’m redefining something that is already set in the config, I feel there should be a generic mechanism that can read in the varying config settings for whichever storage strategy is used, but I didn’t have time to work that one out.

Oh, the smiley.jpg in ‘data’ is there because I wanted to see what the markdown converter would do with a non-markdown file. Answer; it tried to convert it. Again in a real world situation I think you’d want to catch this.
