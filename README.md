# Symfony ux reproducer

Project reproducer for issue [#947](https://github.com/zenstruck/foundry/issues/947)

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `make build` to build fresh image
3. Run `make dev` to start project
4. Run `make bash` to access the php container
5. Run `make down` to stop the containers

## Reproducing the bug:

1. Install the assets with the package manager of your choice: `pnpm install`
2. Try to build the assets: `pnpm dev`
