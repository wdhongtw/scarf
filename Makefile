OWNER=wdhongtw
IMAGE_NAME=scarf
CONTAINER_NAME=scarf
EXPORT_PORT=30082

.PHONY: build run clean clean-image

build:
	docker build -t $(OWNER)/$(IMAGE_NAME) .

run:
	docker run -i -t -p $(EXPORT_PORT):80 --name $(CONTAINER_NAME) $(OWNER)/$(IMAGE_NAME)

clean:
	docker rm $(CONTAINER_NAME)

clean-image:
	docker rmi $(OWNER)/$(IMAGE_NAME)
