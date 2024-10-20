<?php

namespace Pterodactyl\Http\Controllers\Admin\Extensions\brainrot;

use Illuminate\View\View;
use Illuminate\View\Factory as ViewFactory;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\BlueprintFramework\Libraries\ExtensionLibrary\Admin\BlueprintAdminLibrary as BlueprintExtensionLibrary;
use Pterodactyl\Http\Requests\Admin\AdminFormRequest;

class brainrotExtensionController extends Controller
{
  public function __construct(
    private ViewFactory $view,
    private BlueprintExtensionLibrary $blueprint,
  ) {}

  public function index(): View
	{
		return $this->view->make(
			'admin.extensions.{identifier}.index', [
				'root' => '/admin/extensions/{identifier}',
				'blueprint' => $this->blueprint,
			]
		);
	}

	public function post(brainrotSettingsFormRequest $request): View
	{
		$this->blueprint->notify('Applied new brainrot settings');

		$type = $request->input('type');
		$this->blueprint->dbSet('brainrot', 'type', $type);

		if ($custom) {
			$this->blueprint->dbSet('brainrot', 'custom', $custom);
		}

		return $this->view->make(
			'admin.extensions.{identifier}.index', [
				'root' => '/admin/extensions/{identifier}',
				'blueprint' => $this->blueprint,
			]
		);
	}
}

class brainrotSettingsFormRequest extends AdminFormRequest
{
  public function rules(): array
  {
    return [
	'type' => 'required|string|in:none,random,subwaysurfers,minecraft,andrewtate,slime,memes,skibiditoilet,gegagedigedagedago',
	'custom' => 'nullable|string',
    ];
  }
}
