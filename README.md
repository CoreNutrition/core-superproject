# CORE Website

Base repo to support the CORE website, built in WordPress.

The following notes are more guidelines than enforced policies. Please reach out to the CORE team for any problems, issues, suggestions.

## Repo Notes

- Noticably absent from this repo:
    - WordPress Core
        - this is by design, no need to replicate, please do not commit
        - Lastest WordPress will be installed on servers as part of deployment
        - Each dev is responsible for setting up there own local dev environment
    - wp-content/uploads/
        - also by design, please do not commit
    - .gitignore has been setup to help enforce these concepts, please update as needed or reasonable if it is causing problems.

## Development / Deployment Workflow

* Deployments to staging and production will triggered manually by the CORE team

#### Branch Description
* /master 
  * contains only production ready code
  * please create pull requests to integrate requested changes after tested and approved in staging
* /staging 
  * changes commited to staging will be deployed to staging environment
* /dev
  * use the dev branch for local development, commit work frequently

### Plugin Management

**Custom Plugins**

- Custom plugins can be committed to this repo /wp-content/plugins/yourpluginname 
- If you would prefer to handle these differently please reach out, we’re flexible