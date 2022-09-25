IMAGE_NAME:=shape-api
IMAGE_TAG:=latest

default:
	cat ./Makefile
test:
	 php bin/phpunit
serve:
	symfony server:start

docker:
	docker build -t shape/shape-api .