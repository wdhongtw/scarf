# SCARF: Stanford Conference And Research Forum

> SCARF is a php based system that helps researchers and conference
> administrators create discussion forums for their papers. It just needs a
> MySQL backend, a php enabled webserver, and few minutes to set up.

SCARF is created by Paul Tarjan in 2006.

This repo. is a non-official fork of original work and used for personal
experiments.

## Usage

**Note**: all these operation require root permission.

Build docker image

``` sh
make build
```

Run docker container (from image)

``` sh
make run
```

Delete container and image

``` sh
make clean
make clean-image
```

## Links

- [Original Project Site](http://scarf.sourceforge.net/)
