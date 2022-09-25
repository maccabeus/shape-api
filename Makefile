IMAGE_NAME:=shape-api
IMAGE_TAG:=latest

default:
	cat ./Makefile
test:
	 php bin/phpunit
serve:
	symfony server:start
open:
	symfony open:local

docker:
	docker build -t shape/shape-api .

docker-up:
	docker-compose up