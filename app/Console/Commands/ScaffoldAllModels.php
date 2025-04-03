<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class ScaffoldAllModels extends Command
{
    protected $signature = 'infyom:scaffold-all';
    protected $description = 'Tạo hết theo model trong thư mục';

    public function handle()
    {
        $schemaPath = resource_path('model_schemas');
        $files = glob($schemaPath . '/*.json');

        foreach ($files as $file) {
            $fileName = basename($file, '.json');
            $modelName = Str::studly($fileName);

            $this->info("⚙️ Scaffolding: {$modelName}");

            // Gửi sẵn 2 lần "no\n" để trả lời prompt
            $process = new Process([
                'php',
                'artisan',
                'infyom:scaffold',
                $modelName,
                "--fieldsFile=resources/model_schemas/{$fileName}.json"
            ]);

            $process->setInput("no\nno\n"); // trả lời cho 2 prompt
            $process->setTimeout(300); // thời gian chờ đủ dài

            $process->run(function ($type, $buffer) {
                echo $buffer; // show ra output trong terminal
            });

            if (!$process->isSuccessful()) {
                $this->error("❌ Lỗi khi scaffold {$modelName}:\n" . $process->getErrorOutput());
                return 1;
            }
        }

        $this->info("✅ Tất cả model đã được scaffold mà không cần nhập tay!");
        return 0;
    }
}
